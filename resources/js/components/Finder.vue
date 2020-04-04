<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-semibold" id="exampleModalLabel">Find Your Ticket</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="mb-6 text-gray-600">
                        Enter your support ticket number to check your ticket status. You can find your support ticket number in the emial you received from us.
                    </p>

                    <form @submit.prevent="findUid">
                        <div class="mb-6">
                            <label for="uid" class="block">
                                <span class="text-sm mb-2 font-semibold">Enter your support ticket number</span>

                                <input id="uid" type="uid" class="form-input mt-1 block w-full" name="uid" v-model="uid" required autocomplete="uid">
                            </label>

                            <span v-if="errors" class="text-sm block mt-2 text-red-500" role="alert">
                                {{ this.message }}
                            </span>
                        </div>

                        <div class="mb-0 flex justify-between items-center">
                            <button type="submit" class="w-full inline-block py-2 px-4 border border-transparent font-medium rounded-lg text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:border-indigo-400 focus:shadow-outline-indigo active:bg-indigo-400 transition duration-150 ease-in-out">
                                Find Ticket
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['route'],

        data() {
            return {
                uid: null,
                errors: false,
                message: null
            }
        },

        methods: {
            findUid() {
                if (this.uid) {
                    axios.post(this.route, {
                            uid: this.uid
                        })
                        .then((response) => {
                            if (response.data == '') {
                                this.errors = true;
                                this.message = 'Ticket not found.';

                                return;
                            }

                            location.href = response.data.link;
                        });
                }
            }
        }
    }
</script>
