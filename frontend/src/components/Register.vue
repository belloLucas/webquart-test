<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();
const form = ref({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const handleRegister = async () => {
  await axios.post("/register", {
    name: form.value.name,
    email: form.value.email,
    password: form.value.password,
    password_confirmation: form.value.password_confirmation,
  });
  router.push("/");
};
</script>

<template>
  <section>
    <div class="container">
      <div class="wrapper">
        <h4>Crie sua conta</h4>
        <form @submit.prevent="handleRegister">
          <div class="inputs">
            <input
              type="text"
              placeholder="Nome"
              v-model="form.name"
              name="name"
              id="name"
            />
            <input
              type="email"
              placeholder="Email"
              v-model="form.email"
              name="email"
              id="email"
            />
            <input
              type="password"
              placeholder="Senha"
              v-model="form.password"
              name="password"
              id="password"
            />
            <input
              type="password"
              placeholder="Confirme sua senha"
              v-model="form.password_confirmation"
              name="password"
              id="password_confirmation"
            />
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
