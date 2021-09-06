<template>
  <va-layout>
    <va-app-bar
      slot="app-bar"
      :header-menu="headerMenu"
      :profile-menu="profileMenu"
      color="secondary"
      dense
      dark
      @toggle="
        $vuetify.breakpoint.lgAndUp ? (mini = !mini) : (drawer = !drawer)
      "
    ></va-app-bar>
    <va-sidebar
      slot="sidebar"
      :menu="sidebarMenu"
      dark
      v-model="drawer"
      :mini-variant="mini"
    >
      <template v-slot:img="props">
        <v-img
          src="../assets/splash.jpg"
          gradient="to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)"
          v-bind="props"
        />
      </template>
    </va-sidebar>
    <template slot="header">
      <va-breadcrumbs></va-breadcrumbs>
      <impersonate-message></impersonate-message>
    </template>
    <va-aside slot="aside"></va-aside>
    <va-footer slot="footer" :menu="footerMenu">
      YOUR LOCAL LIBRARY. &copy; 2021,
    </va-footer>
  </va-layout>
</template>

<script>
import ImpersonateMessage from "@/components/ImpersonateMessage";
import nav from "../_nav";

export default {
  name: "App",
  components: {
    ImpersonateMessage,
  },
  data() {
    return {
      drawer: null,
      mini: false,
      headerMenu: [
        ...this.$admin.getResourceLinks([
          "publishers",
          "authors",
          "categories",
          "books",
          "reviews",
          "book_requests"
        ]),
        // {
        //   href: "#",
        //   text: "Github",
        // },
      ],
      footerMenu: [
        {
          href: "#",
          text: "HELIUM PRIME",
        },
        // {
        //   href: "#",
        //   text: "Documentation",
        // },
        // {
        //   href: "#",
        //   text: "License",
        // },
      ],
      profileMenu: [
        {
          icon: "mdi-account",
          text: this.$t("menu.profile"),
          link: "/profile",
        },
      ],
      sidebarMenu: nav(this.$i18n, this.$admin),
    };
  },
};
</script>
