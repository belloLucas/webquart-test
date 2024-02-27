<script setup>
import { useAuthStore } from "../stores/auth";
import { ref } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();
const authStore = useAuthStore();

const form = ref({
  password: "",
  password_confirmation: "",
  email: route.query.email,
  token: route.params.token,
});
</script>

<template>
  <section>
    <div class="container">
      <div class="wrapper">
        <h4>Altere sua senha</h4>
        <form @submit.prevent="authStore.handleResetPassword(form)">
          <div class="status" v-if="authStore.status">
            {{ authStore.status }}
          </div>
          <div class="inputs">
            <input
              type="password"
              v-model="form.password"
              name="password"
              id="password"
              placeholder="Senha"
            />
            <div v-if="authStore.errors.password">
              <span class="error">{{ authStore.errors.password[0] }}</span>
            </div>
            <input
              type="password"
              placeholder="Confirme sua senha"
              v-model="form.password_confirmation"
              name="password"
              id="password_confirmation"
            />
          </div>
          <div class="buttons">
            <button type="submit">Alterar senha</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<style lang="scss">
@import "../assets/scss/app.scss";
@import "../assets/scss/form.scss";
</style>
