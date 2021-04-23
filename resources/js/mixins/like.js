export default {
	emits: ['like', 'dislike'],
	methods: {
		like(internship) {
			axios.post(route('likes.store', internship)).then(() => {
				if(internship.liked) {
					internship.liked = false;
					this.$page.props.likes_count--;
					this.$emit('dislike');
				} else {
					internship.liked = true;
					this.$page.props.likes_count++;
				}
			}).catch(err => console.log(err));
		}
	}
}