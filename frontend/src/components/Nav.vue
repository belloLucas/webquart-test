<script setup>
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();
</script>

<template>
  <nav>
    <div class="left">
      <router-link :to="{ name: 'Home' }">
        <img src="../assets/images/logo_medio.png" />
      </router-link>
    </div>
    <div class="right">
      <ul>
        <li>
          <router-link :to="{ name: 'Home' }">Início</router-link>
        </li>
        <template v-if="!authStore.user">
          <li>
            <router-link :to="{ name: 'Login' }">Fazer Login</router-link>
          </li>
          <li>
            <router-link :to="{ name: 'Register' }">Criar Conta</router-link>
          </li>
        </template>
        <template v-else>
          <button @click="authStore.handleLogout" class="logout-btn">
            Sair
          </button>
          <router-link :to="{ name: 'CreateHouse' }" class="announce-house-btn"
            >Anunciar</router-link
          >
        </template>
      </ul>
    </div>
  </nav>
</template>

<style lang="scss">
@import "../assets/scss/app.scss";

nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px;
  background-color: $white;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);

  @media screen and (max-width: 450px) {
    flex-direction: column;
    gap: 20px;
  }

  .left img {
    height: 30px;
  }

  .right ul {
    display: flex;
    gap: 15px;

    li {
      padding: 10px;
      list-style-type: none;
      cursor: pointer;
      transition: 0.3s;

      :hover {
        color: $blue;
      }

      @media screen and (max-width: 450px) {
        border: 1px solid $grey-blue;
        border-radius: 5px;

        &:hover {
          background-color: $darker-grey-blue;
          a {
            color: white;
          }
        }
      }

      a {
        color: $box-title-grey;
        text-decoration: none;
      }
    }
    .logout-btn {
      padding: 10px;
      background-color: transparent;
      border: none;

      @media screen and (max-width: 450px) {
        padding: 0px 15px;
        border: 1px solid $grey-blue;
        border-radius: 5px;
        color: black;
        transition: 0.3s;

        &:hover {
          background-color: $darker-grey-blue;
          color: white;
        }
      }
    }

    .announce-house-btn {
      padding: 10px 20px;
      background-color: $grey-blue;
      color: $white;
      border: none;
      transition: 0.4s;

      &:hover {
        background-color: $darker-grey-blue;
      }
    }
  }
}
</style>
