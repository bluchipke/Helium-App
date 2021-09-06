<template>
  <va-edit-layout>
    <book-requests-form :id="id" :title="title" :item="item"></book-requests-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
