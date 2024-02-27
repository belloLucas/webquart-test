<script setup></script>

<template>
  <div class="container">
    <div class="wrapper">
      <form>
        <h1>Informações básicas do imóvel</h1>
        <div class="house-info">
          <label>Título do imóvel</label>
          <input type="text" name="house_title" id="house_title" />
          <label>Descrição do imóvel</label>
          <textarea name="house_description" id="house_description"></textarea>
          <label>Valor do aluguel</label>
          <input type="text" name="rent_price" id="rent_price" />
          <label>Número de quartos</label>
          <input type="text" name="bedrooms" id="bedrooms" />
          <label>Número de banheiros</label>
          <input type="text" name="restrooms" id="restrooms" />
        </div>
        <h1>Comodidades</h1>
        <div class="radio">
          <label>Contas inclusas?</label>
          <div class="inputs">
            <div class="true">
              <label>Sim</label>
              <input
                type="radio"
                name="bills_included"
                id="bills_included"
                value="true"
              />
            </div>
            <div class="false">
              <label>Não</label>
              <input
                type="radio"
                name="bills_included"
                id="bills_included"
                value="false"
              />
            </div>
          </div>
        </div>
        <h1>Endereço</h1>
        <div class="address">
          <label>Rua</label>
          <input type="text" name="street" id="street" />
          <label>Bairro</label>
          <input type="text" name="neighborhood" id="neighborhood" />
          <label>Cidade</label>
          <input type="text" name="city" id="city" />
          <label>Estado</label>
          <input type="text" name="state" id="state" />
        </div>
        <input type="file" name="house_images" id="house_images" />
        <button type="submit">Cadastrar imóvel</button>
      </form>
    </div>
  </div>
</template>

<style lang="scss">
@import "../assets/scss/app.scss";

.container {
  padding: 3rem 0;
  margin-left: 2.5rem;

  .wrapper {
    form {
      display: flex;
      flex-direction: column;
      text-align: left;
      gap: 1rem;
      width: 29%;

      h1 {
        text-align: left;
        padding: 0;
      }

      .house-info {
        display: flex;
        flex-direction: column;
      }

      input[type="text"],
      button,
      textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid $light-grey;
        border-radius: 5px;
      }

      textarea {
        height: 150px;
        resize: none;
      }

      label {
        margin: 20px 0 5px 0;
      }

      .radio {
        display: flex;
        flex-direction: column;
        gap: 1rem;

        .inputs {
          display: flex;

          .true,
          .false {
            padding: 10px;
            input[type="radio"] {
              vertical-align: middle;
              margin-left: 6px;
            }
          }
        }
      }

      .address {
        display: flex;
        flex-direction: column;
      }

      input[type="file"] {
      }

      button {
        color: $white;
        background-color: $grey-blue;
        transition: 0.3s;

        &:hover {
          background-color: $darker-grey-blue;
        }
      }
    }
  }
}
</style>
