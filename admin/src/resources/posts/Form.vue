<template>
  <va-form :id="id" :item="item">
    <v-row justify="center">
      <v-col sm="6">
        <base-material-card>
          <template v-slot:heading>
            <div class="display-2">
              {{ title }}
            </div>
          </template>
          <v-card-text>
            <va-text-input source="title"></va-text-input>
            <va-text-input source="body" multiline></va-text-input>
            <va-date-input source="post_date"></va-date-input>
            <va-boolean-input source="commentable"></va-boolean-input>
            <va-autocomplete-input
              v-if="$admin.can(['admin'])"
              source="users"
              model="user_id"
              reference="users"
            ></va-autocomplete-input>
            <va-select-input
              source="category"
              model="category"
              reference="categories"
            ></va-select-input>
            <va-boolean-input source="archived"></va-boolean-input>
          </v-card-text>
          <va-save-button></va-save-button>
        </base-material-card>
      </v-col>
    </v-row>
  </va-form>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
