<script setup></script>

<template>
  <section>
    <div class="container">
      <div class="wrapper">
        <h4>Crie sua conta</h4>
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
</style>
