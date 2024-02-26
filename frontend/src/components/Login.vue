<script setup>
import { ref } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

const form = ref({
  email: "",
  password: "",
});
</script>

<template>
  <section>
    <div class="container">
      <div class="wrapper">
        <h4>Acesse sua conta</h4>
        <form @submit.prevent="authStore.handleLogin(form)">
          <div class="inputs">
            <input
              type="email"
              v-model="form.email"
              name="email"
              id="email"
              placeholder="Email"
            />
            <input
              type="password"
              v-model="form.password"
              name="password"
              id="password"
              placeholder="Senha"
            />
          </div>
          <div class="buttons">
            <button type="submit">Entrar</button>
            <a>Esqueceu sua senha?</a>
            <p>Ainda não se cadastrou? <a>Crie uma conta!</a></p>
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
