pipeline {
    agent any

    environment {
        APACHE_ROOT = '/var/www/html'
        DOCS_DIR = '/var/www/html/doc'
    }

    stages {
        stage('Limpieza y Preparación') {
            steps {
                script {
                    // Borra el index.html por defecto de Apache para que no bloquee tu index.php
                    sh "docker exec -u root servidor-tarea rm -f ${APACHE_ROOT}/index.html"
                }
            }
        }

        stage('Deploy to Apache') {
            steps {
                script {
                    // Copia todo el contenido de la raíz del repo a la carpeta de Apache [cite: 2]
                    // Usamos el contenedor 'servidor-tarea' que aparece en tus capturas
                    sh "docker exec -u root servidor-tarea sh -c 'cp -r /var/jenkins_home/workspace/${JOB_NAME}/* ${APACHE_ROOT}/'"
                    
                    // Asegura que Apache tenga permisos para leer los archivos
                    sh "docker exec -u root servidor-tarea chmod -R 777 ${APACHE_ROOT}"
                }
            }
        }

        stage('Generate Documentation') {
            steps {
                script {
                    // Crea la carpeta de documentación si no existe [cite: 3]
                    sh "docker exec -u root servidor-tarea mkdir -p ${DOCS_DIR}"
                    // Genera la documentación con phpDocumentor [cite: 4]
                    sh "docker exec -u root servidor-tarea phpdoc -d ${APACHE_ROOT} -t ${DOCS_DIR} --ignore=doc/"
                }
            }
        }
    }

    post {
        success {
            echo '¡Despliegue y documentación exitosos! Ya puedes revisar localhost/index.php' [cite: 5]
        }
        failure {
            echo 'Algo falló en el despliegue. Revisa los logs de la consola.' [cite: 6]
        }
    }
}