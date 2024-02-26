<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();
const form = ref({
  email: "",
  password: "",
});

const getToken = async () => {
  await axios.get("/sanctum/csrf-cookie");
};

const handleLogin = async () => {
  await getToken();
  await axios.post("/login", {
    email: form.value.email,
    password: form.value.password,
  });
  router.push("/");
};
</script>

<template>
  <section>
    <div class="container">
      <div class="wrapper">
        <h4>Acesse sua conta</h4>
        <form @submit.prevent="handleLogin">
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
