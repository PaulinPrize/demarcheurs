<template>
<div class="container">
    <div class=" card bg-light">
        <h5 class="card-header">Recherche</h5>
        <div class="card-body col-lg-12">
            <form id="formAd" method="POST" :action="url">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="category">Catégorie</label>
                        <select class="custom-select" name="category" id="category" @change="onCategoryChange()" v-model="categorySelected">
                            <option value="0">Toutes</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">
                                {{ category.name }}
                            </option>  
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="region">Région</label>
                        <select class="custom-select" name="region" id="region" @change="onRegionChange()" v-model="regionSelected">
                            <option data-code="0" value="0">Tout le Cameroun</option>
                            <option v-for="region in regions" :key="region.id" :value="region.id" :data-code="region.code">
                                {{ region.name }}
                            </option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <span v-html="annoncesEnCours"></span>
</div>
</template>

<script>

    export default {
        props: [
            'url',
            'categories',
            'regions'
        ],
        data () {
            return {
                categorySelected: 0,
                regionSelected: 0,
                regionIndex: 0,
                regionSlug: '',
                annoncesEnCours: ''
            }
        },
        methods: {
            onCategoryChange() {
                this.submit();
            },
            onRegionChange() {
                const index = event.target.selectedIndex;
                if (index) {
                    this.regionSlug = this.regions[index - 1]['slug'];
                    let code = event.target.options[index].attributes['data-code'].value;
                } else {
                    this.regionSelected = 0;
                }
                this.submit();
            },
            submit(e, comp = '') {
                $.ajax({
                    method: 'post',
                    url: this.url + comp,
                    data: {
                        'category': this.categorySelected,
                        'region': this.regionSelected,
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .done(data => {
                    this.annoncesEnCours = data;
                    let ref = '/ledemarcheur/logements';
                    if(this.regionSelected) {
                        ref += '/' + this.regionSlug
                    }
                    if(comp) {
                        ref += comp;
                    }
                    history.pushState({}, 'Logements', ref);
                })
            }
        },
        mounted(e) {
            this.regionSelected = $('#start').attr('data-id');
            if(this.regionSelected != 0) {
                this.regionSlug = $('#start').attr('data-slug');
            }
            if($('#start').attr('data-page')) {
                this.submit(e, '?page=' + $('#start').attr('data-page'));
            } else {
                this.submit();
            }
        }
    }

    $('body').on('click', 'a.page-link', e => {
        e.preventDefault();
        app.__vue__.$refs.adComp.submit(e, '?' + ($(e.currentTarget).attr('href')).split('?')[1]);
    });

</script>
  