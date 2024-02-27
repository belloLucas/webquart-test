<script setup>
import { onMounted } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

authStore.handleHouseListing();

onMounted(async () => {
  await authStore.getUser();
});
</script>

<template>
  <div v-if="authStore.user">
    <h1>
      Olá, {{ authStore.user?.name }}! Veja essas recomendações de imóveis :)
    </h1>
    <div class="houses-container">
      <div
        v-for="house in authStore.registeredHouses"
        :key="house.id"
        class="box"
      >
        <p class="rent_price">R$ {{ house.rent_price }} por mês</p>
        <h3 class="house_title">{{ house.house_title }}</h3>
        <p class="house_description">{{ house.house_description }}</p>
        <div class="facilities">
          <p class="bedrooms">Quartos: {{ house.bedrooms }}</p>
          <p class="restrooms">Banheiros: {{ house.restrooms }}</p>
        </div>
      </div>
    </div>
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

.houses-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
  padding: 1rem;
  margin: 1rem;

  @media (max-width: 768px) {
    grid-template-columns: repeat(2, 1fr);
  }

  @media (max-width: 480px) {
    grid-template-columns: 1fr;
  }

  .box {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 15px;
    background-color: $white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    min-height: 215px;
    max-height: 215px;

    .rent_price {
      font-size: 15px;
      font-weight: bold;
      color: $light-green;
    }

    .house_title {
      font-weight: 500;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .house_description {
      padding: 6px 0;
      color: $lighter-grey;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .facilities {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-top: auto;
      padding: 15px 0 5px 0;
      border-top: 1px solid $ultra-light-grey;
    }
  }
}
</style>
