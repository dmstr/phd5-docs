# Filesystems

As an ephemeral container, a *phd5* application usually does not store files directly.
It requires one or more storage backends, which are used for permanent file storage.

Example for storing database dumps on S3. 

    yii db/export && \
    yii fs/sync runtime://mysql s3:// --interactive=0 && \
    yii fs/rmdir runtime://mysql --recursive --interactive=0



