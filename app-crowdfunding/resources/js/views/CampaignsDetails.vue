<template>
    <div>
        <v-card v-if="campaign.id">
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
            <v-card-text>
                <v-simple-table dense>
                    <tbody>
                        <tr>
                            <td><v-icon>mdi-home-city</v-icon> Alamat</td>
                            <td>{{campaign.address}}</td>
                        </tr>
                        <tr>
                            <td><v-icon>mdi-hand-heart</v-icon> Terkumpul</td>
                            <td class="blue--text">Rp {{campaign.donation_collected.toLocaleString()}}</td>
                        </tr>
                        <tr>
                            <td><v-icon>mdi-hand-heart</v-icon> Dibutuhkan</td>
                            <td class="orange--text">Rp {{campaign.donation_required.toLocaleString()}}</td>
                        </tr>
                    </tbody>
                </v-simple-table>
                Description:
                <p>{{campaign.description}}</p>
            </v-card-text>
            <v-card-actions>
                <v-btn block color="primary" @click="donate" :disabled="campaign.donation_collected >= campaign.donation_required">
                    <v-icon> mdi-money</v-icon> &nbsp;
                    DONATE
                </v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
    export default {
        data: () => ({
            campaign: {},
        }),
        created() {
            this.go();
        },
        methods: {
            go(){
                let { id } = this.$route.params;
                let url = '/api/campaigns/' + id;
                axios.get(url)
                    .then((response) => {
                        console.log(response);
                        let { data } = response.data;
                        this.campaign = data.campaign;
                    })
                    .catch((error) => {
                        let { response } = error;
                        console.log(response);
                    })
            },
            donate() {
                alert('donate');
            }
        }
    }
</script>
