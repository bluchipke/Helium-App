import i18n from "@/i18n";

/**
 * Date format
 */
["en", "fr"].forEach((locale) => {
  i18n.setDateTimeFormat(locale, {
    short: {
      year: "numeric",
      month: "short",
      day: "numeric",
    },
    long: {
      year: "numeric",
      month: "long",
      day: "numeric",
      weekday: "long",
    },
    longWithTime: {
      year: "numeric",
      month: "long",
      day: "numeric",
      weekday: "long",
      hour: "numeric",
      minute: "numeric",
    },
  });
});

/**
 * Number format
 */
i18n.setNumberFormat("en", {
  currency: {
    style: "currency",
    currency: "KES",
  },
});
i18n.setNumberFormat("fr", {
  currency: {
    style: "currency",
    currency: "EUR",
  },
});
