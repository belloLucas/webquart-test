<script setup>
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();
</script>

<template>
  <nav>
    <div class="left">
      <img src="../assets/images/logo_medio.png" />
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
          <button @click="" class="announce-house-btn">Anunciar</button>
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

      :hover {
        color: $blue;
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
