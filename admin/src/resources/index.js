export default [
  {
    name: "publishers",
    icon: "mdi-globe-model",
    label: "name",
    translatable: true,
    permissions: ["admin", { name: "editor", actions: ["list"] }],
  },
  {
    name: "authors",
    icon: "mdi-account",
    label: "name",
    translatable: true,
    permissions: ["admin", { name: "editor", actions: ["list"] }],
  },
  {
    name: "categories",
    icon: "mdi-tag",
    label: "name",
    translatable: true,
    routes: ["list"],
    permissions: ["admin", "editor"],
  },
  {
    name: "books",
    icon: "mdi-book",
    label: (r) => `${r.title} (${r.isbn})`,
    translatable: true,
    permissions: ["admin", { name: "subscriber", actions: ["list", "show"] }],
    autocompleteFields: ["id", "title", "isbn"],
  },
  {
    name: "posts",
    icon: "mdi-post-outline",
    label: "name",
    permissions: [
      "admin",
      "editor",
      { name: "subscriber", actions: ["list", "show"] },
    ],
  },
  {
    name: "reviews",
    icon: "mdi-comment",
    label: "author",
    permissions: [
      "admin",
      {
        name: "editor",
        actions: ["list", "create", "edit", "show", "delete"],
      },
    ],
  },
  {
    name: "users",
    icon: "mdi-account",
    label: "name",
    routes: ["list"],
    permissions: ["admin"],
  },
  {
    name: "book_requests",
    icon: "mdi-library",
    label: "name",
    permissions: [
      "admin",
      "editor",
      { name: "subscriber", actions: ["create", "edit", "list", "show"] },
    ],
  },
];
