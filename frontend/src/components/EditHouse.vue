<script setup>
import { ref } from "vue";
import { useAuthStore } from "../stores/auth";

const authStore = useAuthStore();

const url = window.location.href;
const house_id = ref(url.substring(url.lastIndexOf("/") + 1));

const converToBool = (value) => {
  if (value && typeof value === "string") {
    if (value.toLowerCase() === "true") {
      return true;
    } else if (value.toLowerCase() === "false") {
      return false;
    }
  }
  return value;
};

const form = ref({
  house_title: "",
  house_description: "",
  rent_price: "",
  bedrooms: "",
  restrooms: "",
  bills_included: false,
  street: "",
  neighborhood: "",
  city: "",
  state: "",
});
</script>

<template>
  <div class="edit-house-container">
    <div class="edit-house-wrapper">
      <form @submit.prevent="authStore.handleHouseEdit(form, house_id)">
        <h1>Informações básicas do imóvel</h1>
        <div class="house-info">
          <label>Título do imóvel</label>
          <input
            v-model="form.house_title"
            type="text"
            name="house_title"
            id="house_title"
          />
          <div v-if="authStore.errors.house_title">
            <span class="error">{{ authStore.errors.house_title[0] }}</span>
          </div>
          <label>Descrição do imóvel</label>
          <textarea
            v-model="form.house_description"
            name="house_description"
            id="house_description"
          />
          <div v-if="authStore.errors.house_description">
            <span class="error">{{
              authStore.errors.house_description[0]
            }}</span>
          </div>
          <label>Valor do aluguel</label>
          <input
            v-model="form.rent_price"
            type="text"
            name="rent_price"
            id="rent_price"
          />
          <div v-if="authStore.errors.rent_price">
            <span class="error">{{ authStore.errors.rent_price[0] }}</span>
          </div>
          <label>Número de quartos</label>
          <input
            v-model="form.bedrooms"
            type="text"
            name="bedrooms"
            id="bedrooms"
          />
          <div v-if="authStore.errors.bedrooms">
            <span class="error">{{ authStore.errors.bedrooms[0] }}</span>
          </div>
          <label>Número de banheiros</label>
          <input
            v-model="form.restrooms"
            type="text"
            name="restrooms"
            id="restrooms"
          />
          <div v-if="authStore.errors.restrooms">
            <span class="error">{{ authStore.errors.restrooms[0] }}</span>
          </div>
        </div>

        <h1>Comodidades</h1>
        <div class="radio">
          <label>Contas inclusas?</label>
          <div class="inputs">
            <div v-if="authStore.errors.bills_included">
              <span class="error">{{
                authStore.errors.bills_included[0]
              }}</span>
            </div>
            <div class="true">
              <label>Sim</label>
              <input
                @change="
                  form.bills_included = converToBool(form.bills_included)
                "
                v-model="form.bills_included"
                type="radio"
                name="bills_included"
                id="bills_included"
                value="true"
              />
            </div>
            <div class="false">
              <label>Não</label>
              <input
                @change="
                  form.bills_included = converToBool(form.bills_included)
                "
                v-model="form.bills_included"
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
          <input v-model="form.street" type="text" name="street" id="street" />
          <div v-if="authStore.errors.street">
            <span class="error">{{ authStore.errors.street[0] }}</span>
          </div>
          <label>Bairro</label>
          <input
            v-model="form.neighborhood"
            type="text"
            name="neighborhood"
            id="neighborhood"
          />
          <div v-if="authStore.errors.neighborhood">
            <span class="error">{{ authStore.errors.neighborhood[0] }}</span>
          </div>
          <label>Cidade</label>
          <input v-model="form.city" type="text" name="city" id="city" />
          <div v-if="authStore.errors.city">
            <span class="error">{{ authStore.errors.city[0] }}</span>
          </div>
          <label>Estado</label>
          <input v-model="form.state" type="text" name="state" id="state" />
          <div v-if="authStore.errors.state">
            <span class="error">{{ authStore.errors.state[0] }}</span>
          </div>
        </div>
        <button type="submit">Cadastrar imóvel</button>
      </form>
    </div>
  </div>
</template>

<style lang="scss">
@import "../assets/scss/app.scss";

.edit-house-container {
  padding: 3rem 0;
  margin-left: 2.5rem;

  .edit-house-wrapper {
    form {
      display: flex;
      flex-direction: column;
      text-align: left;
      gap: 1rem;
      width: 40%;

      @media screen and (max-width: 968px) {
        width: 70%;
      }

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
