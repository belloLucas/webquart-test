<script setup>
import { onMounted, ref } from "vue";
import { useAuthStore } from "../stores/auth";
const authStore = useAuthStore();

const url = window.location.href;
const id = url.substring(url.lastIndexOf("/") + 1);

onMounted(async () => {
  await authStore.getUser();
});

const averageNote = ref(0);

(async () => {
  await authStore.handleSpecificHouse(id);
  const user_id = authStore.openedHouse?.user_id;
  if (user_id) {
    authStore.handleFindUser(user_id);
  }
  await authStore.handleCommentsListing(id);
  averageNote.value = await average();
})();

const form = ref({
  user_id: authStore.openedHouse?.user_id,
  house_id: id,
  comment: "",
  avaliation_note: "",
});

const isOwner = () => {
  if (authStore.user?.id === authStore.openedHouse?.user_id) {
    return true;
  }
  return false;
};

const average = async () => {
  const comments = authStore.registeredComments;
  let sum = 0;
  comments.forEach((comment) => {
    sum += comment.avaliation_note;
  });
  return sum / comments.length;
};
</script>

<template>
  <main>
    <div class="house-container">
      <div class="image">
        <!-- <img :src="authStore.openedHouse?.house_image" alt="Imagem da casa" /> -->
        <img src="../assets/images/house_image_placeholder.png" />
        <p class="average_note">
          Nota média deste imóvel:
          {{ averageNote }}
        </p>
      </div>
      <div class="main-informations">
        <div class="title_note">
          <h1>
            {{ authStore.openedHouse?.house_title }}
          </h1>
        </div>
        <h4>Valor do aluguel</h4>
        <p class="rent_price">
          R$ {{ authStore.openedHouse?.rent_price }} por mês
        </p>
        <h4>Comidades</h4>

        <div class="facilities">
          <p>Quartos: {{ authStore.openedHouse?.bedrooms }}</p>
          <p>Banheiros: {{ authStore.openedHouse?.restrooms }}</p>
        </div>

        <h4>Localização</h4>
        <div class="address">
          <p>
            {{ authStore.openedHouse?.neighborhood }},
            {{ authStore.openedHouse?.city }} -
            {{ authStore.openedHouse?.state }}
          </p>
        </div>
        <h4>Descrição</h4>
        <p>
          {{ authStore.openedHouse?.house_description }}
        </p>

        <h4>Informações do proprietário</h4>
        <div class="user-information">
          <img src="../assets/images/profile_picture_placeholder.png" />
          <h5>{{ authStore.user_information?.name }}</h5>
        </div>

        <h4>Comentários</h4>
        <div v-if="authStore.user && isOwner() === false">
          <div class="box_create_comment">
            <h5>Deixe um comentário</h5>
            <form
              @submit.prevent="authStore.handleCreateComment(form)"
              class="comment_form"
            >
              <textarea v-model="form.comment" name="comment" />
              <input
                type="number"
                v-model="form.avaliation_note"
                name="avaliation_note"
                min="1"
                max="5"
                id="avaliation_note"
                placeholder="Envie sua nota para este imóvel"
              />
              <button type="submit">Enviar comentário</button>
            </form>
          </div>
        </div>
        <div
          v-for="comment in authStore.registeredComments"
          :key="comment.id"
          class="comment"
        >
          <h6 class="user_name">
            {{ comment.name }}
          </h6>
          <p class="text_comment">
            {{ comment.comment }}
          </p>
          <p class="avaliation_note">Nota: {{ comment.avaliation_note }}/5</p>
        </div>
      </div>
    </div>
  </main>
</template>

<style lang="scss">
@import "../assets/scss/app.scss";

.house-container {
  margin: 1rem auto;
  background-color: $white;
  max-height: 90%;
  max-width: 50%;

  @media screen and (max-width: 768px) {
    max-width: 80%;
  }

  .image {
    max-width: 100%;
    position: relative;

    img {
      width: 100%;
    }

    .average_note {
      position: absolute;
      top: 90%;
      left: 70%;
      font-weight: 600;
      color: $gold;
    }

    @media screen and (max-width: 1200px) {
      .average_note {
        top: 90%;
        left: 60%;
      }
    }

    @media screen and (max-width: 950px) {
      .average_note {
        top: 85%;
        left: 55%;
      }
    }

    @media screen and (max-width: 768px) {
      .average_note {
        top: 90%;
        left: 62%;
      }
    }

    @media screen and (max-width: 600px) {
      .average_note {
        top: 85%;
        left: 55%;
      }
    }

    @media screen and (max-width: 550px) {
      .average_note {
        top: 86%;
        left: 45%;
      }
    }

    @media screen and (max-width: 450px) {
      .average_note {
        top: 85%;
        left: 40%;
      }
    }

    @media screen and (max-width: 400px) {
      .average_note {
        top: 85%;
        left: 35%;
      }
    }

    @media screen and (max-width: 350px) {
      .average_note {
        top: 83%;
        left: 25%;
      }
    }

    @media screen and (max-width: 330px) {
      .average_note {
        top: 80%;
        left: 20%;
      }
    }
  }

  .main-informations {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 3rem;
    font-size: 20px;

    .rent_price {
      font-size: 16px;
      font-weight: 600;
      color: $light-green;
    }

    .title_note {
      display: flex;
      justify-content: space-between;
      align-items: center;

      h1 {
        font-size: 26px;
        padding: 0;
        margin-bottom: 1.4rem;
        text-align: left;
      }
    }

    .facilities {
      display: flex;
      gap: 20px;
    }

    p {
      margin-left: 1rem;
      padding-bottom: 10px;
    }
    h4 {
      margin-bottom: 0.3rem;
    }

    .user-information {
      display: flex;
      align-items: center;
      padding: 1rem;
      gap: 20px;

      img {
        max-width: 150px;
        padding: 5px;
        border: 1px solid $lighter-grey;
        border-radius: 50%;
      }
    }

    .box_create_comment {
      width: 50%;

      h5 {
        margin-bottom: 10px;
      }

      .comment_form {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }

      textarea,
      input[type="text"],
      input[type="number"],
      button {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid $light-grey;
      }

      textarea {
        height: 100px;
        resize: none;
      }

      button {
        background-color: $grey-blue;
        color: white;
        transition: 0.3s;

        &:hover {
          background-color: $darker-grey-blue;
        }
      }
    }

    .comment {
      display: flex;
      flex-direction: column;
      gap: 10px;
      padding: 1rem;
      border-radius: 5px;
      background-color: $light-grey;

      P {
        margin-left: 0;
      }

      .user_name {
        font-size: 18px;
        font-weight: 600;
      }

      .text_comment {
        font-size: 16px;
      }

      .avaliation_note {
        font-size: 16px;
        font-weight: 600;
        color: $light-green;
      }
    }
  }
}
</style>
