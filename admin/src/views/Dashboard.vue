<template>
  <div>
    <v-row>
      <v-col cols="12" sm="6" lg="3">
        <base-material-stats-card
          color="info"
          icon="mdi-twitter"
          title="REQUESTS"
          :value="total"
          sub-icon="mdi-clock"
          sub-text="Just Updated"
        />
      </v-col>

      <v-col cols="12" sm="6" lg="3">
        <base-material-stats-card
          color="primary"
          icon="mdi-poll"
          title="BOOKS"
          :value="books"
          sub-icon="mdi-tag"
          sub-text="Tracked from Google Analytics"
        />
      </v-col>

      <v-col cols="12" sm="6" lg="3">
        <base-material-stats-card
          color="success"
          icon="mdi-store"
          title="AUTHORS"
          :value="authors"
          sub-icon="mdi-calendar"
          sub-text="Last 24 Hours"
        />
      </v-col>

      <v-col cols="12" sm="6" lg="3">
        <base-material-stats-card
          color="orange"
          icon="mdi-sofa"
          title="ARTICLES"
          :value="articles"
          sub-icon="mdi-alert"
          sub-icon-color="red"
          sub-text="Get More Space..."
        />
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  props: ["resource"],
  data() {
    return {
      total: "0",
      books: "0",
      authors: "0",
      articles: "0",
    };
  },
  methods: {
    async getRequests() {
      await this.$admin.http
        .get("api/book_requests")
        .then((response) => {
          this.total = response.data.data.length.toString();
        })
        .catch(function (error) {
          // console.log(error);
        });

      // get the number of books
      await this.$admin.http.get("api/books")
        .then((response) => {
          this.books = response.data.data.length.toString();
        }).catch(function (error) {
          // console.log("Something went wrong...");
        });

        // get the number of authors
      await this.$admin.http.get("api/authors")
        .then((response) => {
          this.authors = response.data.data.length.toString();
        }).catch(function (error) {
          // console.log("Something went wrong...");
        });

        // get the number of articles
      await this.$admin.http.get("api/posts")
        .then((response) => {
          this.articles = response.data.data.length.toString();
        }).catch(function (error) {
          // console.log("Something went wrong...");
        });
    },
  },
  mounted() {
    this.getRequests();
  },
};
</script>
