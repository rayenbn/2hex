<template>
    
    <div class="m-portlet__head">

        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h1 class="m-portlet__head-text">{{ title }}</h1>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline" id="breadcrumbs">
                    <li v-for="link in links" :key="link.name" class="m-nav__item" >
                        <a :href="link.href">
                            <span class="m-nav__link-text">{{ link.name }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <a
                        data-toggle="m-tooltip"
                        class="m-portlet__nav-link m-portlet__nav-link--icon"
                        data-direction="left"
                        data-width="auto"
                        :title="tooltip"
                    >
                        <i class="flaticon-info m--icon-font-size-lg3"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HeadConfigurator",
        props: {
            title: {
                type: String,
                default: "Configurator"
            },
            links: {
                type: Array,
                default: () => []
            },
            tooltip: {
                type: String,
                default: "Get help with filling up this form"
            }
        }
    }
</script>

<style scoped>
    ul.m-subheader__breadcrumbs {
        list-style-type: none;
        text-align: center;
    }

    li {
        display: inline;
    }

    li:not(:last-child):after {
        content: ' -';
        padding-right: 3px;
    }

    li > a {
        color: #6f727d;
        font-weight: 400;
        text-decoration: none;
    }

    li > a:hover {
        color: #716aca;
    }
</style>