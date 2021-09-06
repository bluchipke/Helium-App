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
              <va-field
                source="user.name"
                labelKey="Name"
                type="select"
              ></va-field>
              <va-field
                source="book.title"
                labelKey="Book Title"
                type="select"
              ></va-field>
              <va-field source="request_date" type="date"></va-field>
              <va-field
                source="status"
                type="select"
                chip
                color="orange"
              ></va-field>
              <va-field source="notes"></va-field>
              <va-field source="return_date" type="date"></va-field>
              <va-field source="return_notes"></va-field>
              <va-field source="authorized_by"></va-field>
              <va-field source="collection" chip type="select"></va-field>
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
