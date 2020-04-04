module.exports = {
  theme: {
    customForms: theme => ({
      default: {
        input: {
          borderRadius: theme('borderRadius.lg'),
          backgroundColor: theme('colors.gray.100'),
          '&:focus': {
            backgroundColor: theme('colors.white'),
          }
        },
        select: {
          borderRadius: theme('borderRadius.lg'),
          boxShadow: theme('boxShadow.none'),
          backgroundColor: theme('colors.gray.100'),
          '&:focus': {
            backgroundColor: theme('colors.white'),
          }
        },
        checkbox: {
          backgroundColor: theme('colors.gray.100'),
          width: theme('spacing.6'),
          height: theme('spacing.6'),
        },
        radio: {
          backgroundColor: theme('colors.gray.100'),
          width: theme('spacing.4'),
          height: theme('spacing.4'),
        },
      },
    }),
    extend: {
      // fontFamily: {
      //   sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      // },
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/custom-forms'),
  ],
}
