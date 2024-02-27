<script>
import { ref } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();
const email = ref("");
</script>

<template>
  <div class="container">
    <div class="wrapper">
      <h4>Esqueceu sua senha?</h4>
      <form
        class="form"
        @submit.prevent="authStore.handleForgotPassword(email)"
      >
        <label>Seu email</label>
        <input type="email" />
        <button type="submit">Enviar</button>
      </form>
    </div>
  </div>
</template>

<style lang="scss">
@import "../assets/scss/app.scss";

.container {
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border: none;
  background-color: transparent;

  h4 {
    text-align: left;
    margin-bottom: 1.5rem;
  }

  .wrapper {
    .form {
      display: flex;
      flex-direction: column;

      label {
        margin-bottom: 5px;
      }

      input {
        width: 350px;
        padding: 8px 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
      }

      button {
        width: 100px;
        padding: 7px 15px;
        border: none;
        background-color: $grey-blue;
        color: $white;
        border-radius: 5px;
      }
    }
  }
}
</style>
