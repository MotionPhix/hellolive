<script setup lang="ts">
import {ref} from 'vue'
import {toast} from 'vue-sonner'
import PhoneInput from "@/components/PhoneInput.vue";

const props = defineProps<{
  billboard: {
    id: number
    name: string
    location: string
    monthly_rate: string
  }
}>()

const isOpen = ref(false)
const isLoading = ref(false)
const errors = ref<Record<string, string>>({})

const form = ref({
  name: '',
  email: '',
  phone: '',
  company: '',
  start_date: '',
  duration: '1',
  message: ''
})

const submitQuote = async () => {
  isLoading.value = true
  errors.value = {}

  try {
    const response = await fetch('/api/quote-requests', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
      },
      body: JSON.stringify({
        billboard_id: props.billboard.id,
        ...form.value
      })
    })

    const data = await response.json()

    if (!response.ok) {
      if (response.status === 422) {
        errors.value = data.errors
        toast.error('Please correct the errors in the form.')
        return
      }

      throw new Error('Failed to submit quote request')
    }

    toast.success('Quote request submitted successfully! We\'ll get back to you soon.')

    isOpen.value = false

    form.value = {
      name: '',
      email: '',
      phone: '',
      company: '',
      start_date: '',
      duration: '1',
      message: ''
    }
  } catch (error) {
    toast.error('Failed to submit quote request. Please try again.')
  } finally {
    isLoading.value = false
  }
}
</script>

<template>
  <AlertDialog :open="isOpen" @update:open="isOpen = $event" @pointerDownOutside.prevent @escapeKeyDown.prevent>
    <AlertDialogTrigger as-child>
      <Button variant="outline" class="flex-1" size="lg">
        Request Quote
      </Button>
    </AlertDialogTrigger>

    <AlertDialogContent class="sm:max-w-[500px]">
      <AlertDialogHeader>
        <AlertDialogTitle>Request Quote for {{ billboard.name }}</AlertDialogTitle>
        <AlertDialogDescription>
          Fill out this form to request a quote for advertising on this billboard.
          Monthly rate starts at {{ billboard.monthly_rate }}.
        </AlertDialogDescription>
      </AlertDialogHeader>

      <form @submit.prevent="submitQuote" class="space-y-4">
        <div class="grid gap-4">
          <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2 grid">
              <Label for="name">Name</Label>
              <Input
                id="name" class="h-11"
                placeholder="Enter your full name"
                :class="{ 'border-destructive': errors.name }"
                v-model="form.name" required
              />

              <span v-if="errors.name" class="text-sm text-destructive">
                {{ errors.name }}
              </span>
            </div>

            <div class="space-y-2 grid">
              <Label for="company">Company</Label>
              <Input
                id="company" class="h-11"
                :class="{ 'border-destructive': errors.company }"
                placeholder="Enter your company name"
                v-model="form.company" required
              />

              <span v-if="errors.company" class="text-sm text-destructive">
                {{ errors.company }}
              </span>
            </div>
          </div>

          <div class="space-y-2 grid">
            <Label for="email">Email</Label>
            <Input
              id="email" type="email"
              class="h-11" placeholder="Enter your email address"
              :class="{ 'border-destructive': errors.email }"
              v-model="form.email" required
            />

            <span v-if="errors.email" class="text-sm text-destructive">
              {{ errors.email }}
            </span>
          </div>

          <div class="space-y-2">
            <Label for="phone">Phone</Label>
            <PhoneInput
              id="phone" v-model="form.phone"
              :error="errors.phone"
              default-country="MW"
            />
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div class="space-y-2 grid">
              <Label for="start_date">Start Date</Label>
              <Input
                id="start_date"
                class="h-11" type="date"
                v-model="form.start_date" required
                :min="new Date().toISOString().split('T')[0]"
                :class="{ 'border-destructive': errors.start_date }"
              />

              <span v-if="errors.start_date" class="text-sm text-destructive">
                {{ errors.start_date }}
              </span>
            </div>

            <div class="space-y-2 grid">
              <Label for="duration">Duration (months)</Label>
              <Select
                id="duration"
                v-model="form.duration"
                required>
                <SelectTrigger
                  class="h-11"
                  :class="{ 'border-destructive': errors.duration }">
                  <SelectValue placeholder="Select a period (duration)" />
                </SelectTrigger>

                <SelectContent>
                  <SelectItem value="3">3 month</SelectItem>
                  <SelectItem value="4">4 months</SelectItem>
                  <SelectItem value="6">6 months</SelectItem>
                  <SelectItem value="12">12 months</SelectItem>
                  <SelectItem value="24">24 months</SelectItem>
                </SelectContent>
              </Select>

              <span v-if="errors.duration" class="text-sm text-destructive">
                {{ errors.duration }}
              </span>
            </div>
          </div>

          <div class="space-y-2">
            <Label for="message">Additional Details</Label>
            <Textarea
              id="message"
              v-model="form.message"
              placeholder="Any specific requirements or questions?"
              class="min-h-[100px]"
            />
          </div>
        </div>
      </form>

      <AlertDialogFooter>
        <Button
          size="lg"
          type="button"
          variant="outline"
          @click="isOpen = false">
          Cancel
        </Button>

        <Button
          size="lg"
          type="submit"
          :disabled="isLoading">
          {{ isLoading ? 'Submitting...' : 'Submit Request' }}
        </Button>
      </AlertDialogFooter>
    </AlertDialogContent>
  </AlertDialog>
</template>
