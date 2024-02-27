<script setup>
import { ref } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

const form = ref({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});
</script>

<template>
  <section>
    <div class="container">
      <div class="wrapper">
        <h4>Crie sua conta</h4>
        <form @submit.prevent="authStore.handleRegister(form)">
          <div class="inputs">
            <input
              type="text"
              placeholder="Nome"
              v-model="form.name"
              name="name"
              id="name"
            />
            <div v-if="authStore.errors.name">
              <span class="error">{{ authStore.errors.name[0] }}</span>
            </div>
            <input
              type="email"
              placeholder="Email"
              v-model="form.email"
              name="email"
              id="email"
            />
            <div v-if="authStore.errors.email">
              <span class="error">{{ authStore.errors.email[0] }}</span>
            </div>
            <input
              type="password"
              placeholder="Senha"
              v-model="form.password"
              name="password"
              id="password"
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
            <div v-if="authStore.errors.password_confirmation">
              <span class="error">{{
                authStore.errors.password_confirmation[0]
              }}</span>
            </div>
          </div>
          <div class="buttons">
            <button type="submit">Cadastrar</button>
            <p>Já é cadastrado? <a>acesse sua conta!</a></p>
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
