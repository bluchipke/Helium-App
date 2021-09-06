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
          <template>
            <v-card-text>
              <va-select-input
                v-if="$admin.can(['admin'])"
                source="user"
                model="user_id"
                reference="users"
              ></va-select-input>
              <va-autocomplete-input
                source="book"
                model="book_id"
                reference="books"
              ></va-autocomplete-input>
              <va-date-input
                v-if="$admin.can(['admin'])"
                source="request_date"
                disabled
              ></va-date-input>
              <va-select-input
                v-if="$admin.can(['admin'])"
                source="status"
              ></va-select-input>
              <va-date-input source="return_date"></va-date-input>
              <va-text-input source="notes" multiline></va-text-input> 
              <va-text-input
                v-if="$admin.can(['admin'])"
                source="return_notes"
                multiline
              ></va-text-input>
              <va-select-input
                v-if="$admin.can(['admin'])"
                source="authorized_by"
                reference="users"
              ></va-select-input>
              <va-select-input source="collection"></va-select-input>
              <va-select-input
                v-if="$admin.can(['admin'])"
                source="return_status"
              ></va-select-input>
              <va-select-input
                v-if="$admin.can(['admin'])"
                source="state"
              ></va-select-input>
            </v-card-text>
          </template>
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
