import { ref } from 'vue'

const activeTheme = ref(null)

export function useTheme() {
  const setTheme = async (name) => {
    try {
      const theme = await import(`../Themes/${name}/theme.config.js`)
      activeTheme.value = theme.default
    } catch (e) {
      console.error('Erro ao carregar tema', e)
    }
  }

  return {
    activeTheme,
    setTheme
  }
}
