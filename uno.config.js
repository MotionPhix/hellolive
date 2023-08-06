import {
  defineConfig,
  presetIcons, presetTypography, presetUno, presetWebFonts,
  transformerDirectives, transformerVariantGroup,
} from 'unocss'

import { presetForms } from '@julr/unocss-preset-forms'

export default defineConfig({
  shortcuts: [
    // ...
  ],

  theme: {
    darkMode: 'class',
  },

  presets: [
    presetUno(),

    presetIcons(),

    presetForms(),

    presetTypography(),

    presetWebFonts({
      provider: 'none',

      fonts: {
        sans: 'v-sans',
        // mono: 'v-mono',
      },
    }),
  ],

  transformers: [
    transformerDirectives(),
    transformerVariantGroup(),
  ],
})
