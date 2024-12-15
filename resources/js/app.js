import './bootstrap'

import Awesomplete from 'awesomplete'
import { debounce } from 'lodash'

import.meta.glob(['../images/**'])

document.addEventListener('DOMContentLoaded', () => {
    initSearch()
})

const initSearch = () => {
    const input = document.getElementById('search-input')
    if (!input) return

    input.value = ''

    const awesomplete = new Awesomplete(input, {
        minChars: 3,
        maxItems: undefined,
        replace: (suggestion) => {
            input.value = suggestion.label
        },
    })

    input.addEventListener(
        'input',
        debounce(() => {
            const query = input.value

            if (query.length < 3) return

            const url = input.getAttribute('data-suqqestion-url')
            axios.get(url, { params: { query: query } }).then((response) => {
                const items = response.data.map((item) => ({
                    label: item.name,
                    value: item.id,
                }))
                awesomplete.list = items
            })
        }, 300)
    )

    input.addEventListener('awesomplete-select', (e) => {
        const selectedCityId = e.text.value
        window.location.href = `/${selectedCityId}`
    })
}
