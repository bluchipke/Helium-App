<template>
  <va-show-layout>
    <va-show :item="item">
      <v-row justify="center">
        <v-col sm="6">
          <base-material-card>
            <template v-slot:heading>
              <div class="display-2">
                {{ title }}
              </div>
            </template>
            <v-card-text>
              <va-field source="title"></va-field>
              <va-field source="body"></va-field>
              <va-field source="post_date" type="date"></va-field>
              <va-field source="commentable" type="boolean"></va-field>
              <va-field
                source="author.name"
                labelKey="Author"
                reference="authors"
                type="chip"
                color="orange"
              ></va-field>
              <va-field source="category.name" labelKey="category" type="chip">
              </va-field>
              <va-field source="archived" type="boolean"></va-field>
            </v-card-text>
          </base-material-card>
        </v-col>
      </v-row>
    </va-show>
  </va-show-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
