<template>
    <div>
        <v-container class="ma-0 pa-0" grid-list-sm>
            <v-subheader>
                All Campaigns
            </v-subheader>
            <v-layout wrap>
                <v-flex v-for="(campaign) in campaigns" :key="`campaign-`+campaign.id" xs6>
<!--                    <v-card :to="`/campaign/`+campaign.id">-->
<!--                        <v-img :src="campaign.image" class="white&#45;&#45;text">-->
<!--                            <v-card-title class="fill-height align-end" v-text="campaign.title">-->

<!--                            </v-card-title>-->
<!--                        </v-img>-->
<!--                    </v-card>-->
                    <campaignItem :campaign="campaign" :key="`campaign-`+campaign.id"/>
                </v-flex>
            </v-layout>
            <v-pagination
                v-model="page"
                @input="go"
                :length="lengthPage"
                :total-visible="6"
            >
            </v-pagination>
        </v-container>
    </div>
</template>

<script>
    import campaignItem from "../components/CampaignItem.vue"
    export default {
        data: () => ({
            campaigns: [],
            page: 0,
            lengthPage: 0
        }),
        components: {
            campaignItem
        },
        created() {
            this.go();
        },
        methods: {
            go(){
                let url = '/api/campaigns?page=' + this.page;
                axios.get(url)
                    .then((response) => {
                        let { data } = response.data;
                        this.campaigns = data.campaigns.data;
                        this.page = data.campaigns.current_page;
                        this.lengthPage = data.campaigns.last_page;
                    })
                    .catch((error) => {
                        let { response } = error;
                        console.log(response);
                    })
            }
        }
    }
</script>
