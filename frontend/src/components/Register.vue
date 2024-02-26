<script setup></script>

<template>
  <section>
    <div class="container">
      <div class="wrapper">
        <h4>Crie sua conta</h4>
        <form>
          <div class="inputs">
            <input type="text" name="name" id="name" placeholder="Nome" />
            <input type="email" name="email" id="email" placeholder="Email" />
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Senha"
            />
            <input
              type="password"
              name="password"
              id="password"
              placeholder="Confirme sua senha"
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
