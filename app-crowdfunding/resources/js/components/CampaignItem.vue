<template>
    <div>
        <v-card :to="`/campaigns/`+campaign.id">
            <v-img
                :src="campaign.image"
                class="white--text"
                height="200px"
            >
                <v-card-title
                    class="fill-height align-end"
                    v-text="campaign.title"
                >
                </v-card-title>
            </v-img>
            <v-card-actions>
                <v-progress-linear
                    v-model="progress"
                    color="blue-grey"
                    height="7"
                >
                </v-progress-linear>
            </v-card-actions>
            <v-card-actions>
                <v-icon>mdi-cash</v-icon>
                <span>Rp {{campaign.donation_required.toLocaleString('id-ID')}}</span>
                <v-spacer></v-spacer>
                <span>{{progress}}%</span>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
    export default {
        name: "campaign-item",
        props: ['campaign'],
        computed: {
            progress() {
                let donation = this.campaign.donation_collected / this.campaign.donation_required * 100;
                return donation.toFixed(2);
            }
        }
    }
</script>

<style scoped>

</style>
