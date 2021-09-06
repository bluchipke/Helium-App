<template>
  <div>
    <va-aside-layout :title="asideTitle">
      <book-requests-form v-if="show" :item="item"></book-requests-form>
      <book-requests-form
        v-else
        :id="id"
        :item="item"
        @saved="onSaved"
      ></book-requests-form>
    </va-aside-layout>
    <va-show-layout>
      <va-show :item="item">
        <v-row justify="center">
          <v-col lg="8">
            <base-material-tabs-card
              :tabs="[
                { id: 'attributes', icon: 'mdi-eye' },
                { id: 'summary', icon: 'mdi-text' },
              ]"
            >
              <template v-slot:attributes>
                <v-row>
                  <v-col>
                    <va-field source="isbn"></va-field>
                    <va-field
                      source="cover"
                      type="image"
                      src="thumbnails.large"
                    ></va-field>
                    <va-field
                      source="publisher"
                      type="reference"
                      reference="publishers"
                      chip
                      color="orange"
                    ></va-field>
                    <va-field source="title"></va-field>
                    <va-field
                      source="category.name"
                      labelKey="category"
                      type="chip"
                    ></va-field>
                  </v-col>
                  <v-col>
                    <va-field source="formats" type="array" select></va-field>
                    <va-field source="tags" type="array"></va-field>
                    <va-field
                      source="price"
                      type="number"
                      format="currency"
                    ></va-field>
                    <va-field source="commentable" type="boolean"></va-field>
                    <va-field source="publication_date" type="date"></va-field>
                    <va-field
                      source="authors"
                      type="reference-array"
                      reference="authors"
                      color="orange"
                    ></va-field>
                  </v-col>
                </v-row>
                <va-field source="description"></va-field>
                <va-field
                  source="reviews"
                  type="reference-array"
                  reference="reviews"
                  color="green"
                  column
                ></va-field>
              </template>
              <template v-slot:summary>
                <va-rich-text-field source="summary"></va-rich-text-field>
                <va-field source="extract" type="file"></va-field>
              </template>
              <template v-slot:footer>
                <v-row>
                  <v-col>
                    <va-action-button
                      :label="$t('books.request')"
                      icon="mdi-library"
                      @click="onAction"
                    ></va-action-button>
                  </v-col>
                  <v-col>
                    <va-action-button
                      :label="$t('books.buy')"
                      icon="mdi-cart"
                      color="orange"
                    ></va-action-button>
                  </v-col>
                </v-row>
              </template>
            </base-material-tabs-card>
          </v-col>
        </v-row>
      </va-show>
    </va-show-layout>
  </div>
</template>

<script>
export default {
  props: ["title", "item"],
  data() {
    return {
      asideTitle: null,
      id: null,
      items: null,
      show: false,
    };
  },
  methods: {
    async onAction() {
      // (this.asideRequest = title), (this.id = id);
      this.asideTitle = "Request Book";
      this.show = "show";
      // this.items = items;
    },
    onSaved() {
      this.asideTitle = null;
      // this.$refs.list.fetchData();
    },
  },
};
</script>
