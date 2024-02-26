<script setup></script>

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
        <li>
          <router-link :to="{ name: 'Login' }">Fazer Login</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'Register' }">Criar Conta</router-link>
        </li>
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
  }
}
</style>
