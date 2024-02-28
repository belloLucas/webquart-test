import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    authUser: null,
    authErrors: [],
    authStatus: [],
    registeredHouses: [],
    userHouses: [],
    openedHouse: [],
    user_information: [],
    registeredComments: [],
  }),
  getters: {
    user: (state) => state.authUser,
    house: (state) => state.registeredHouses,
    specificHouse: (state) => state.specificHouse,
    allUserHouses: (state) => state.userHouses,
    errors: (state) => state.authErrors,
    status: (state) => state.authStatus,
    specificUser: (state) => state.user,
    comments: (state) => state.registeredComments,
  },
  actions: {
    async getToken() {
      await axios.get("/sanctum/csrf-cookie");
    },
    async getUser() {
      await this.getToken();
      const data = await axios.get("/api/user");
      this.authUser = data.data;
    },
    async handleLogin(data) {
      this.authErrors = [];
      await this.getToken();

      try {
        await axios.post("/login", {
          email: data.email,
          password: data.password,
        });
        this.router.push("/");
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors;
        }
      }
    },
    async handleRegister(data) {
      this.authErrors = [];
      await this.getToken();

      try {
        await axios.post("/register", {
          name: data.name,
          email: data.email,
          password: data.password,
          password_confirmation: data.password_confirmation,
        });
        this.router.push("/");
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors;
        }
      }
    },
    async handleLogout() {
      await axios.post("/logout");
      this.authUser = null;
    },
    async handleForgotPassword(email) {
      this.authErrors = [];
      this.getToken();
      try {
        const response = await axios.post("/forgot-password", {
          email: email,
        });
        this.authStatus = response.data.status;
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors;
        }
      }
    },
    async handleResetPassword(resetData) {
      this.authErrors = [];
      try {
        const response = await axios.post("/reset-password", resetData);
        this.authStatus = response.data.status;
        this.router.push("/login");
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors;
        }
      }
    },
    async handleCreateHouse(data) {
      this.authErrors = [];
      await this.getToken();

      try {
        await axios.post("/api/houses", {
          user_id: this.authUser.id,
          house_title: data.house_title,
          house_description: data.house_description,
          rent_price: data.rent_price,
          bedrooms: data.bedrooms,
          restrooms: data.restrooms,
          bills_included: data.bills_included,
          street: data.street,
          neighborhood: data.neighborhood,
          city: data.city,
          state: data.state,
        });
        this.router.push("/");
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors;
        }
      }
    },
    async handleHouseListing() {
      const data = await axios.get("/api/houses");
      this.registeredHouses = data.data;
    },
    async handleSpecificHouse(id) {
      const data = await axios.get(`/api/houses/${id}`);
      this.openedHouse = data.data;
    },
    async handleFindUser(id) {
      const data = await axios.get(`/api/users/${id}`);
      this.user_information = data.data;
    },
    async handleCreateComment(data) {
      this.authErrors = [];
      await this.getToken();

      try {
        await axios.post("/api/comments", {
          house_id: data.house_id,
          user_id: this.authUser.id,
          comment: data.comment,
          avaliation_note: data.avaliation_note,
        });
        this.router.push(`/house/${data.house_id}`);
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors;
        }
      }
    },
    async handleCommentsListing(house_id) {
      const data = await axios.get(`/api/comments/${house_id}`);
      this.registeredComments = data.data;
    },
    async handleUserHousesListing(user_id) {
      const data = await axios.get(`/api/user/houses/${user_id}`);
      this.userHouses = data.data;
      console.log(data.data);
    },
    async handleHouseDelete(house_id) {
      await axios.delete(`/api/houses/${house_id}`);
    },
    async handleHouseEdit(data, house_id) {
      this.authErrors = [];
      await this.getToken();

      try {
        await axios.patch(`/api/houses/${house_id}`, {
          house_title: data.house_title,
          house_description: data.house_description,
          rent_price: data.rent_price,
          bedrooms: data.bedrooms,
          restrooms: data.restrooms,
          bills_included: data.bills_included,
          street: data.street,
          neighborhood: data.neighborhood,
          city: data.city,
          state: data.state,
        });
        this.router.push(`/house/${house_id}`);
      } catch (error) {
        if (error.response.status === 422) {
          this.authErrors = error.response.data.errors;
        }
      }
    },
  },
});
