<?php
$structuredData = [
  "@context" => "https://schema.org",
  "@type" => "LocalBusiness",
  "name" => COMPANY_NAME,
  "image" => IMG_OG,
  "telephone" => COMPANY_PHONE,
  "email" => COMPANY_EMAIL,
  "address" => [
    "@type" => "PostalAddress",
    "streetAddress" => COMPANY_ADDRESS,
    "addressLocality" => GEO_REGION,
    "postalCode" => GEO_CODE_POSTAL,
    "addressCountry" => "FR"
  ],
  "geo" => [
    "@type" => "GeoCoordinates",
    "latitude" => GEO_POSITION_LATITUDE,
    "longitude" => GEO_POSITION_LONGITUDE
  ],
  "url" => htmlspecialchars($canonical),
  "sameAs" => [
    URL_FACEBOOK,
    URL_GOOGLE
  ],
  "description" => htmlspecialchars($description),
  "logo" => IMG_LOGO,
  "priceRange" => COMPANY_PRICE_HOUR
];
?>