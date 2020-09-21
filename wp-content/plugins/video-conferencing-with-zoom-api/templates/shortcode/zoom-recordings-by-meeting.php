<?php
/**
 * The Template for displaying list of recordings via meeting ID
 *
 * This template can be overridden by copying it to yourtheme/video-conferencing-zoom/shortcode/zoom-recordings-by-meeting.php.
 *
 * @package    Video Conferencing with Zoom API/Templates
 * @version     3.5.0
 */

global $zoom_recordings;
?>
<div class="vczapi-recordings-meeting-id-description">
    <ul>
        <li><strong><?php _e( 'Meeting ID', 'video-conferencing-with-zoom-api' ); ?>:</strong> <?php echo $zoom_recordings->id; ?></li>
        <li><strong><?php _e( 'Topic', 'video-conferencing-with-zoom-api' ); ?>:</strong> <?php echo $zoom_recordings->topic; ?></li>
        <li><strong><?php _e( 'Total Size', 'video-conferencing-with-zoom-api' ); ?>:</strong> <?php echo vczapi_filesize_converter( $zoom_recordings->total_size ); ?></li>
    </ul>
</div>
<table id="vczapi-recordings-list-table" class="vczapi-recordings-list-table vczapi-user-meeting-list">
    <thead>
    <tr>
        <th><?php _e( 'Start Date', 'video-conferencing-with-zoom-api' ); ?></th>
        <th><?php _e( 'End Date', 'video-conferencing-with-zoom-api' ); ?></th>
        <th><?php _e( 'Size', 'video-conferencing-with-zoom-api' ); ?></th>
        <th><?php _e( 'Action', 'video-conferencing-with-zoom-api' ); ?></th>
    </tr>
    </thead>
    <tbody>
	<?php
	foreach ( $zoom_recordings->recording_files as $recording ) {
		if ( $recording->file_type !== "MP4" ) {
			break;
		}
		?>
        <tr>
            <td><?php echo vczapi_dateConverter( $recording->recording_start, $zoom_recordings->timezone, 'F j, Y, g:i a' ); ?></td>
            <td><?php echo vczapi_dateConverter( $recording->recording_end, $zoom_recordings->timezone, 'F j, Y, g:i a' ); ?></td>
            <td><?php echo vczapi_filesize_converter( $recording->file_size ); ?></td>
            <td>
                <a href="<?php echo $recording->play_url; ?>" target="_blank"><?php _e( 'Play', 'video-conferencing-with-zoom-api' ); ?></a>
				<?php if ( $zoom_recordings->downloadable ) { ?>
                    <a href="<?php echo $recording->download_url; ?>" target="_blank"><?php _e( 'Download', 'video-conferencing-with-zoom-api' ); ?></a>
				<?php } ?>
            </td>
        </tr>
		<?php
	}
	?>
    </tbody>
</table>