<template>
	<div class="flex-shrink-0 2xl:w-96 order-2 2xl:order-first mt-6 2xl:mt-0">
		<form @submit.prevent="filter" autocomplete="off" class="mb-6 flex rounded-lg shadow overflow-hidden">
			<input
				type="text"
				class="form-control text-base px-4 rounded-none border-none focus:placeholder-transparent"
				style="shadow: none;"
				name="search"
				v-model="search"
				placeholder="Find an internship by title"
			/>
			<button class="btn btn-primary py-3 rounded-none border-none">
				Search
			</button>
		</form>
		<card title="Filters" subtitle="Lorem ipsum dolor sit amet consectetur adipisicing elit.">
			<div class="sm:flex flex-wrap">
				<div class="p-6 w-full">
					<label>Fields of Study</label>
					<div class="mt-4 space-y-2">
						<div v-for="field in fields" :key="field.id" class="flex justify-between items-center">
							<div class="flex items-center">
								<input type="checkbox" :value="field.id" v-model="selected.fields" />
								<span class="ml-2 leading-5">{{ field.name }}</span>
							</div>
							<div class="tag tag-sm tag-primary rounded-full h-6 w-6 flex-center">{{ field.internships_count }}</div>
						</div>
					</div>
				</div>

				<div class="p-6 w-full border-t">
					<label>Companies</label>
					<div class="mt-4 space-y-2">
						<div v-for="company in companies" :key="company.id" class="flex justify-between items-center">
							<div class="flex items-center">
								<input type="checkbox" :value="company.id" v-model="selected.companies" />
								<span class="ml-2 leading-5">{{ company.name }}</span>
							</div>
							<div class="tag tag-sm tag-primary rounded-full h-6 w-6 flex-center">{{ company.internships_count }}</div>
						</div>
					</div>
				</div>

				<div class="p-6 w-full border-t">
					<label>Cities</label>
					<div class="mt-4 space-y-2">
						<div v-for="city in cities" :key="city.id" class="flex justify-between items-center">
							<div class="flex items-center">
								<input type="checkbox" :value="city.id" v-model="selected.cities" />
								<span class="ml-2 leading-5">{{ city.name }}</span>
							</div>
							<div class="tag tag-sm tag-primary rounded-full h-6 w-6 flex-center">{{ city.internships_count }}</div>
						</div>
					</div>
				</div>

			</div>
		</card>
		<div class="mt-4 flex justify-center">
			<button @click="reset" class="btn btn-md btn-secondary uppercase">
				Reset Filters
			</button>
		</div>
	</div>
</template>

<script>
import { throttle } from "lodash";

export default {
	props: {
		fields: {
			type: Array,
			required: true
		},
		cities: {
			type: Array,
			required: true
		},
		companies: {
			type: Array,
			required: true
		},
		filters: {
			type: Object,
			required: true
		},
	},
	data() {
		return {
			selected: {
				fields: this.filters.fields || [],
				cities: this.filters.cities || [],
				companies: this.filters.companies || [],
			},
			search: this.filters.search
		}
	},
	emits: ['filter'],
	watch: {
		selected: {
			handler: function() {
				this.filter();
			},
			deep: true,
		},
		search: {
			handler: throttle(function () {
				this.filter()
			}, 500)
		}
	},
	methods: {
		filter() {
			this.$inertia.get(
				this.route('internships.index'),
				{
					...this.selected,
					search: this.search
				},
				{
					preserveState: true,
					preserveScroll: true,
					replace: true
				}
			)
			this.$emit('filter', this.selected);
		},
		reset() {
			this.$inertia.get(this.route('internships.index'))
		}
	},
}
</script>
