<template>
	<a :href="resourceUrl || '#'"
		class="unified-search__result"
		@click="onClick">
		<!-- Icon describing the result -->
		<div class="unified-search__result-icon"
			:class="{
				'unified-search__result-icon--rounded': rounded,
				'unified-search__result-icon--no-preview': !hasValidThumbnail,
				'unified-search__result-icon--with-thumbnail': hasValidThumbnail,
				[iconClass]: true
			}"
			role="img">
			<img v-if="hasValidThumbnail" :src="thumbnailUrl" :alt="t('core', 'Thumbnail for {result}', {result: title})">
		</div>

		<!-- Title and sub-title -->
		<span class="unified-search__result-content">
			<h3 class="unified-search__result-line-one">{{ title }}</h3>
			<h4 v-if="subline" class="unified-search__result-line-two">{{ subline }}</h4>
		</span>
	</a>
</template>

<script>
export default {
	name: 'SearchResult',

	props: {
		thumbnailUrl: {
			type: String,
			default: null,
		},
		title: {
			type: String,
			required: true,
		},
		subline: {
			type: String,
			default: null,
		},
		resourceUrl: {
			type: String,
			default: null,
		},
		iconClass: {
			type: String,
			default: '',
		},
		rounded: {
			type: Boolean,
			default: false,
		},
	},

	data() {
		return {
			hasValidThumbnail: this.thumbnailUrl && this.thumbnailUrl.trim() !== '',
		}
	},

	methods: {
		onClick(e) {
			this.$emit('click', e)
		},
	},
}
</script>

<style lang="scss" scoped>
$clickable-area: 44px;
$margin: 10px;

.unified-search__result {
	display: flex;
	height: $clickable-area;
	padding: $margin;
	border-bottom: 1px solid var(--color-border);

	// Load more entry,
	&:last-child {
		border-bottom: none;
	}

	&:active,
	&:hover,
	&:focus {
		background-color: var(--color-background-hover);
	}

	* {
		cursor: pointer;
	}

	&-icon {
		overflow: hidden;
		width: $clickable-area;
		height: $clickable-area;
		border-radius: var(--border-radius);
		background-position: center center;
		background-size: cover;
		&--rounded {
			border-radius: $clickable-area / 2;
		}
		&--no-preview {
			background-size: 32px;
		}
		&--with-thumbnail {
			// compensate for border
			max-width: $clickable-area - 2px;
			max-height: $clickable-area - 2px;
			border: 1px solid var(--color-border);
		}

		img {
			// Make sure to keep ratio
			width: 100%;
			height: 100%;

			object-fit: cover;
			object-position: center;
		}
	}

	&-icon,
	&-actions {
		flex: 0 0 $clickable-area;
	}

	&-content {
		display: flex;
		align-items: center;
		flex: 1 1 100%;
		flex-wrap: wrap;
		// Set to minimum and gro from it
		min-width: 0;
		padding-left: $margin;
	}

	&-line-one,
	&-line-two {
		overflow: hidden;
		flex: 1 1 100%;
		margin: 0;
		white-space: nowrap;
		text-overflow: ellipsis;
		// Use the same color as the `a`
		color: inherit;
		font-size: inherit;
	}
	&-line-two {
		opacity: .7;
		font-size: 14px;
	}
}

</style>
