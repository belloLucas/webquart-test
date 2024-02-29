<script setup>
import { onMounted, ref, watchEffect } from "vue";
import { useAuthStore } from "../stores/auth";
const authStore = useAuthStore();

const userHousesSize = ref(0);
const forceUpdate = ref(0);

onMounted(async () => {
  await authStore.getUser();
  await getHousesFromUser();
  userHousesSize.value = authStore.userHouses.length;
});

const getHousesFromUser = async () => {
  if (authStore.user) {
    const user_id = authStore.user.id;
    if (user_id) await authStore.handleUserHousesListing(user_id);
  }
};

watchEffect(() => {
  forceUpdate.value++;
});
</script>

<template>
  <div class="user_information_container">
    <div v-if="authStore.user" class="user_information">
      <img
        src="../assets/images/profile_picture_placeholder.png"
        alt="foto do
      usuário"
      />
      <p>{{ authStore.user.name }}</p>
      <p>{{ authStore.user.email }}</p>
      <p>Anúncios ativos: {{ userHousesSize }}</p>
    </div>
  </div>

  <div :key="forceUpdate" class="house_listing">
    <div class="house" v-for="house in authStore.userHouses" :key="house.id">
      <div class="img">
        <img src="../assets/images/house_image_placeholder.png" />
      </div>
      <p class="rent_price">R$: {{ house.rent_price }} por mês</p>

      <h4 class="house_title">{{ house.house_title }}</h4>

      <p class="house_description">Descrição: {{ house.house_description }}</p>

      <div class="facilities">
        <p class="bedrooms">Quartos: {{ house.bedrooms }}</p>
        <p class="restrooms">Banheiros: {{ house.restrooms }}</p>
      </div>

      <div class="buttons">
        <form @submit.prevent>
          <router-link :to="{ name: 'EditHouse', params: {id: house.id} }">Editar</router-link>
          <button @click="authStore.handleHouseDelete(house.id)" type="submit">
            Excluir
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
@import "../assets/scss/app.scss";

.user_information_container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 60%;
  margin: auto;
  margin-top: 20px;
  padding: 10px;
  background-color: $light-grey;

  @media screen and (max-width: 768px) {
    width: 80%;
  }

  @media screen and (max-width: 480px) {
    width: 90%;
  }

  .user_information {
    display: flex;
    align-items: center;
    gap: 1rem;

    @media screen and (max-width: 420px) {
      flex-direction: column;
    }
  }
}

.house_listing {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
  padding: 1rem;
  margin: 1rem;

  @media screen and (max-width: 768px) {
    grid-template-columns: repeat(2, 1fr);
  }

  @media screen and (max-width: 480px) {
    grid-template-columns: repeat(1, 1fr);
  }

  .house {
    display: flex;
    flex-direction: column;
    gap: 10px;
    min-height: 350px;
    max-height: 450px;
    padding: 5px;

    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    background-color: $white;

    .img {
      img {
        max-width: 100%;
      }
    }
    .rent_price {
      font-size: 15px;
      font-weight: bold;
      color: $light-green;
    }

    .house_title {
      font-size: 20px;
      font-weight: 500;
      overflow: hidden;
      text-overflow: ellipsis;
      color: black;
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
      padding: 15px 0;
      border-top: 1px solid $ultra-light-grey;
    }

    .buttons {
      padding: 15px 0 5px 0;
      form {
        display: flex;
        gap: 10px;
      }
      border-top: 1px solid $ultra-light-grey;
      button, a{
        padding: 5px 15px;
        border: 1px solid $grey-blue;
        background: none;
        transition: 0.3s;
        color: black;
        text-decoration: none;

        &:hover {
          cursor: pointer;
          color: $white;
          background-color: $grey-blue;
        }
      }
    }
  }
}
</style>
