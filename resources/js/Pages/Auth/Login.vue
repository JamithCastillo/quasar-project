<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

     

        <form @submit.prevent="submit">
            <div>
                
                <!-- <InputLabel for="email" value="Correo Electrónico" /> -->
                <div class="field flex flex-col-2  sm:justify-center items-center ">
                    <i aria-hidden="true" class="text-lg text-cyan-900	 q-icon q-field-icon q-field-margin material-icons">email</i>
                <input
                    id="email"
                    type="email"
                    class="mt-1 block hover:ring-0 outline-0	outline-inherit	 focus:ring-0 ring-0"
                    v-model="form.email"
                    required
                    placeholder="Email"
                />
                <div class="line"></div>
</div>

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                
                <div class="field flex flex-col-2  sm:justify-center items-center ">
                    <i aria-hidden="true" class="text-lg text-cyan-900 q-icon q-field-icon q-field-margin material-icons">lock</i>
                <input
                    id="password"
                    type="password"
                    class="mt-1 block hover:ring-0 focus:ring-0 ring-0"
                    v-model="form.password"
                    required
                    placeholder="Password"
                />
                <div class="line"></div>
</div>
               
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                </label>
            </div>

            <div class="flex items-center py-9 justify-center mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>

                <PrimaryButton class="ml-4  " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Iniciar sesion
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
<style>

input {
  background: 0;
  border: 0;
  outline: none;
  width: 27vw;
  max-width: 400px;
  font-size: 1.5em;
  /* transition: padding 0.3s 0.2s ease; */
}
input:focus {
  padding-bottom: 5px;
  outline: 2px solid red;
}
input:focus + .line:after {
  transform: scaleX(1);
}
.field {
  position: relative;
}
.field .line {
  width: 80%;
  height: 1px;
  position: absolute;
  bottom: -8px;
  background: #bdc3c7;
}
.field .line:after {
  content: " ";
  position: absolute;
  float: right;
  width: 100%;
  height: 2px;
  transform: scalex(0);
  transition: transform 0.3s ease;
  background: #000000;
}

</style>