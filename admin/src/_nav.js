export default (i18n, admin) => [
  {
    icon: "mdi-view-dashboard",
    text: i18n.t("menu.dashboard"),
    link: "/",
  },
  { divider: true },
  { heading: i18n.t("menu.bookstore") },
  // admin.can(["admin", "editor", "author", "subscriber"]) && {
  //   icon: "mdi-book",
  //   text: i18n.t("menu.posts"),
  //   lin: "/posts"
  // },
  admin.getResourceLink("book_requests"),
  admin.getResourceLink("posts"),
  ...admin.getResourceLinks([
    "publishers",
    "authors",
    "categories",
    "books",
    "reviews",
  ]),
  { divider: true },
  { heading: i18n.t("menu.other") },

  admin.getResourceLink("users"),
  admin.can(["admin"]) && {
    icon: "mdi-settings",
    text: i18n.t("menu.settings"),
    link: "/settings",
  },
  admin.can(["admin", "editor", "subscriber"]) && {
    icon: "mdi-message",
    text: i18n.t("menu.feedback"),
    link: "/feedback",
  },
  { icon: "mdi-help-circle", text: i18n.t("menu.help"), link: "/help" },
  { icon: "mdi-account-question", text: i18n.t("menu.terms"), link: "/terms" },
];
