<script setup></script>

<template>
  <section>
    <div class="container">
      <div class="wrapper">
        <h4>Acesse sua conta</h4>
        <form>
          <div class="inputs">
            <input type="email" name="email" id="email" placeholder="Email" />
            <input
              type="password"
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

.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 30%;
  height: 70%;
  margin-top: 2rem;

  background-color: $white;
  border: 1px solid $box-title-grey;
  border-radius: 2px;

  .wrapper {
    width: 90%;
    height: 80%;
  }

  h4 {
    margin: 10px 0 35px 0;
    text-align: center;
  }

  .inputs {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 20px;

    input {
      padding: 7px;
      border: 1px solid $grey;
      border-radius: 5px;
      outline: none;
    }
  }
  .buttons {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: column;
    gap: 20px;

    a {
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 8px;
      cursor: pointer;
      background-color: $grey-blue;
      color: white;
      border: none;
    }
  }
}
</style>
