<script setup>
import { onMounted } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

onMounted(async () => {
  await authStore.getUser();
});
</script>

<template>
  <div v-if="authStore.user">
    <h1>
      Olá, {{ authStore.user?.name }}! Veja essas recomendações de imóveis :)
    </h1>
    <h1>{{ authStore.user?.email }}</h1>
  </div>
  <div v-else>
    <h1>Faça login para poder anunciar e avaliar onde já se hospedou :)</h1>
  </div>
</template>

<style lang="scss">
@import "../assets/scss/app.scss";

h1 {
  padding: 3rem;
  font-size: 20px;
  text-align: center;
}
</style>
