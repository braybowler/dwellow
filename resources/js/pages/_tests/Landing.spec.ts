import { describe, it, expect } from 'vitest'
import { mount } from '@vue/test-utils'
import Landing from '@/pages/Landing.vue';

describe('Landing Page', () => {
    describe('Rendering', () => {
        it('renders', () => {
            const wrapper = mount(Landing)

            expect(wrapper.exists()).toBeTruthy()
        })
    })
})
