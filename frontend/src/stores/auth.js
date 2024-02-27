import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    authUser: null,
    authErrors: [],
    authStatus: [],
    registeredHouses: [],
  }),
  getters: {
    user: (state) => state.authUser,
    house: (state) => state.registeredHouses,
    errors: (state) => state.authErrors,
    status: (state) => state.authStatus,
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
          house_picture: data.house_images,
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
      console.log(data.data);
      this.registeredHouses = data.data;
      console.log(this.registeredHouses);
    },
  },
});
