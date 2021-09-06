<template>
  <base-material-card :icon="resource.icon" :title="title">
    <va-list :filters="filters" :include="['category', 'user']">
      <va-data-table :fields="fields"> </va-data-table>
    </va-list>
  </base-material-card>
</template>

<script>
export default {
  props: ["resource", "title"],
  data() {
    return {
      filters: [],
      fields: [
        { source: "title", sortable: true },
        {
          source: "category.name",
          labelKey: "category",
          type: "chip",
          color: "orange",
          sortable: true,
        },
        {
          source: "user.name",
          type: "chip",
          labelKey: "Author",
          sortable: true,
        },
        {
          source: "post_date",
          labelKey: "Publish Date",
          type: "date",
          sortable: true,
        },
      ],
    };
  },
};
</script>
